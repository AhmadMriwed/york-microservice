<?php

namespace App\Http\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class BaseClients
{
    /**
     * @var Client
     */
    private $client;

    /**
     * UserHttpClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'inventory/']);
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
    public function sendApiRequest()
    {
        try {
            // إعداد البيانات
            //$url = 'https://example.com/api/endpoint';
            $url = 'http://127.0.0.1:8000/api/temp';
            $body = ['key1' => 'value1', 'key2' => 'value2'];
            $queryParameters = ['param1' => 'value1', 'param2' => 'value2'];

            // إعداد العميل
            $client = new Client();
            error_log('1');
            // إرسال الطلب
            $response = $client->get($url,
            [
                'verify' => false, // تجاوز التحقق من الشهادة SSL
                //'query' => $queryParameters,
                //'json' => $body,
                // 'headers' => [
                //     'Content-Type' => 'application/json',
                //     // يمكنك إضافة المزيد من الرؤوس إذا كان ذلك ضروريًا
                // ],
            ]);
error_log('2');
            // الحصول على الاستجابة
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            error_log('3');
            // يمكنك استخدام $statusCode و $body كما تحتاج

            // على سبيل المثال، إرجاع البيانات كمصفوفة
            return json_decode($body, true);
            error_log('4');
        } catch (RequestException $e) {
            // تعامل مع الأخطاء هنا
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : null;
            $errorBody = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();

            // يمكنك التحقق من $statusCode و $errorBody واتخاذ الإجراء المناسب

            // على سبيل المثال، إرجاع الخطأ كمصفوفة
            return [
                'error' => true,
                'status_code' => $statusCode,
                'message' => $errorBody,
            ];
        }
    }
}
