<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.02.18
 * Time: 16:24
 */

namespace alexsisukin\AmoCrm;


class Core
{
    private $user_login;
    private $user_hash;
    private $sub_domain;
    private $auth_cookie;
    /** @var Request */
    private $request;
    private $host;

    public function __construct($user_login, $user_hash, $sub_domain, $debug = false)
    {
        $this->user_login = $user_login;
        $this->user_hash = $user_hash;
        $this->sub_domain = $sub_domain;
        $this->host = 'https://' . $this->sub_domain . '.amocrm.ru';
        $this->request = new Request($this->host, $debug);
    }

    /**
     * @return Account
     */
    public function Account()
    {
        return new Account($this);
    }

    /**
     * @return Trade
     */
    public function Trade()
    {
        return new Trade($this);
    }

    public function Contacts()
    {
        return new Contacts($this);
    }

    public function Company()
    {
        return new Company($this);
    }

    public function Customers()
    {
        return new Customers($this);
    }

    /**
     * Возвращает массив кук после удачной авторизации с сохранением в переменную обьекта
     * @return bool|array
     */
    public function Auth()
    {
        $link = '/private/api/auth.php?type=json';
        $options = [
            'json' => [
                'USER_LOGIN' => $this->user_login,
                'USER_HASH' => $this->user_hash,
            ],
            'headers' => [
                'Content-Type' => 'application/json'
            ],
        ];
        $response = $this->request->Post($link, $options, false, true);
        if (!isset($response['headers']['Set-Cookie']) || empty($response['headers']['Set-Cookie'])) {
            return false;
        }
        foreach ($response['headers']['Set-Cookie'] as $cookie) {
            $cookie = explode(';', $cookie);
            $this->auth_cookie .= $cookie[0] . '; ';
        }

        return $this->auth_cookie;
    }

    /**
     * @return mixed
     */
    public function getUserLogin()
    {
        return $this->user_login;
    }

    /**
     * @param mixed $user_login
     */
    public function setUserLogin($user_login)
    {
        $this->user_login = $user_login;
    }

    /**
     * @return mixed
     */
    public function getUserHash()
    {
        return $this->user_hash;
    }

    /**
     * @param mixed $user_hash
     */
    public function setUserHash($user_hash)
    {
        $this->user_hash = $user_hash;
    }

    /**
     * @return mixed
     */
    public function getSubDomain()
    {
        return $this->sub_domain;
    }

    /**
     * @param mixed $sub_domain
     */
    public function setSubDomain($sub_domain)
    {
        $this->sub_domain = $sub_domain;
    }

    /**
     * @return mixed
     */
    public function getAuthCookie()
    {
        return $this->auth_cookie;
    }

    /**
     * @param mixed $auth_cookie
     */
    public function setAuthCookie($auth_cookie)
    {
        $this->auth_cookie = $auth_cookie;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host)
    {
        $this->host = $host;
    }

}