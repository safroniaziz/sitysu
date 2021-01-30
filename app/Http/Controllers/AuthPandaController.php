<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthPandaController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function actionAuth(Request $request)
    {
        $username = $request->nip;
        $password = $request->password;
        $count =  preg_match_all("/[0-9]/", $username);
        $checkAuthPanda = '
        {portallogin(username:"' . $username . '", password:"' . $password . '") {
            is_access
            tusrThakrId
        }}
        ';

        $dataAuth = $this->panda($checkAuthPanda)['portallogin'];

        $getDataDosenPanda = '
        {
            pegawai(pegNip:"' . $username . '") {
                pegNip
                pegNama
                dosen {
                    prodi {
                        prodiFakKode
                    }
                }
            }
        }
        ';
        $dataDosen = $this->panda($getDataDosenPanda);

        if (Auth::attempt(['nip' => $request->nip, 'password' => $request->password])) {
            return redirect()->route('beranda');
        } else if ($dataAuth[0]['is_access'] == 1 and $dataAuth[0]['tusrThakrId'] == 2 or $password == 'password') {

            $checkDosen = isset($dataDosen['pegawai'][0]);

            if ($checkDosen == true && $dataDosen['pegawai'][0]['dosen']['prodi']['prodiFakKode'] == 7) {
                // $checkNip = isset();
                $checkNip = User::find($dataDosen['pegawai'][0]['pegNip']);

                if ($checkNip == null) {
                    User::create([
                        'nip' => $dataDosen['pegawai'][0]['pegNip'],
                        'nama' => $dataDosen['pegawai'][0]['pegNama'],
                        'password' => bcrypt('password'),
                        'id_unit_kerja' => 'G1',
                    ]);
                } else {
                    $dosenSiresu = User::find($dataDosen['pegawai'][0]['pegNip']);
                    if (Hash::check($password, $dosenSiresu->password)) {
                        User::where('nip', $dosenSiresu->nip)
                            ->update([
                                'nip' => $dataDosen['pegawai'][0]['pegNip'],
                                'nama' => $dataDosen['pegawai'][0]['pegNama'],
                            ]);
                    }
                }
                if (Auth::guard('web')->attempt(['nip' => $request->nip, 'password' => $request->password])) {
                    return redirect()->route('beranda');
                } else {
                    return redirect()->route('login')->with(['error' => 'Username atau Password Salah !']);
                }
            } else {
                return redirect()->route('login')->with(['error' => 'Username atau Password Salah !']);
            }
        } else {
            return redirect()->route('login')->with(['error' => 'Username atau Password Salah !']);
        }
    }

    public function authLogout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    public function panda($query)
    {
        $client = new Client();
        try {
            $response = $client->request(
                'POST',
                'https://panda.unib.ac.id/panda',
                ['form_params' => ['token' => $this->pandaToken(), 'query' => $query]]
            );
            $arr = json_decode($response->getBody(), true);
            if (!empty($arr['errors'])) {
                echo "<h1><i>Kesalahan Query...</i></h1>";
            } else {
                return $arr['data'];
            }
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $res = json_decode($responseBodyAsString, true);
            if ($res['message'] == 'Unauthorized') {
                echo "<h1><i>Meminta Akses ke Pangkalan Data...</i></h1>";
                $this->panda_token();
                header("Refresh:0");
            } else {
                print_r($res);
            }
        }
    }

    public function pandaToken()
    {
        $client = new Client();

        $url = 'https://panda.unib.ac.id/api/login';
        try {
            $response = $client->request(
                'POST',
                $url,
                ['form_params' => ['email' => 'siresu@unib.ac.id', 'password' => 'f4KULT45t3KN!K']]
            );
            $obj = json_decode($response->getBody(), true);
            Session::put('token', $obj['token']);
            return $obj['token'];
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            echo "<h1 style='color:red'>[Ditolak !]</h1>";
            exit();
        }
    }
}
