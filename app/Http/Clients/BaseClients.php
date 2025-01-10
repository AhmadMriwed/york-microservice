<?php

namespace App\Http\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Nette\Utils\Arrays;

class BaseClients
{
    /**
     * @var Client
     */
    private $client;
    private $server_url;
    private $header;

    /**
     * UserHttpClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'inventory/']);
        $this->server_url=env('CMS_URL').env('CMS_ACCSESS_ROUTE');
        $this->header=[
             'Content-Type' => 'application/json',
             'accept'=>['application/json'],
             "accept-language"=>app()->getLocale(),
        ];
    }


    /**
     * @param array $products
     * @return Collection
     */
    // public function sendRequest(array $products): Collection
    // {



    //     $response = Http::withToken($this->getToken())->retry(2, 0, function (Exception $exception, PendingRequest $request) {
    //         if (! $exception instanceof RequestException || $exception->response->status() !== 401) {
    //             return false;
    //         }

    //         $request->withToken($this->getNewToken());

    //         return true;
    //     })->post(/* ... */);


    //     try {
    //         $res = [];
    //         foreach ($products as $product){
    //           $res[$product] = json_decode()
    //               ->getBody()
    //               ->getContents());
    //         }
    //     } catch (BadResponseException $exception) {
    //         throw new HttpException(
    //             $exception->getCode(),
    //             json_decode($exception->getResponse()->getBody()->getContents())
    //         );
    //     }

    //     return new Collection($res);
    // }
    public function sendApiRequest($method="GET", $url='',$body = [], $queryParameters = [])
    {
        try {
        
    
            Log::info('HTTP method: ' . gettype($method) . ' - ' . var_export($method, true));
            if (!is_string($method)) {
                throw new \InvalidArgumentException("HTTP method must be a string");
            }
            // إعداد البيانات
            $url =  $this->server_url.$url??'';

            // إعداد العميل
            //$client = new Client();
            // إرسال الطلب
            $response = $this->client->request($method,$url,
            [
                'verify' => false, // تجاوز التحقق من الشهادة SSL
                'query' => $queryParameters,
                'json' => $body,
                'headers' =>  $this->header,
            ]);
            // الحصول على الاستجابة
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
           // يمكنك استخدام $statusCode و $body كما تحتاج

            // على سبيل المثال، إرجاع البيانات كمصفوفة
            return json_decode($body, true);

        } catch (RequestException $e) {

            // تعامل مع الأخطاء هنا
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : null;
            $errorBody = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
            $jsonErrorBody=json_decode( $errorBody );
            // يمكنك التحقق من $statusCode و $errorBody واتخاذ الإجراء المناسب
            // على سبيل المثال، إرجاع الخطأ كمصفوفة
            return [
                'error' => true,
                'status_code' => $statusCode,
                'message'=>$jsonErrorBody->message?? $errorBody,
            ];
           // return json_decode( $errorBody );
        }
    }
}
