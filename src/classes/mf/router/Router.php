<?php

namespace MediaPhoto\mf\router;

use MediaPhoto\mf\router\AbstractRouter;
use MediaPhoto\mf\auth\AbstractAuthentification;

class Router extends AbstractRouter
{

    public function addRoute(string $name, string $action, string $ctrl): void
    {
        self::$routes[$action] = $ctrl;
        self::$aliases[$name] = $action;
    }

    public function setDefaultRoute(string $action): void
    {
        self::$aliases["default"] = $action;
    }

    public function run(): void
    {

        if (isset($this->request->get["action"])) {
            $action = $this->request->get["action"];
            if (array_key_exists($action, self::$routes)) {
                $controller = new self::$routes[$action];
                $controller->execute();
            } else {
                $home = self::$aliases["default"];
                $home = new self::$routes[$home];
                $home->execute();
            }
        } else {
            $home = self::$aliases["default"];
            $home = new self::$routes[$home];
            $home->execute();
        }
    }

    static function executeRoute(string $alias)
    {
        if (array_key_exists($alias, self::$aliases)) {
            $action = self::$aliases[$alias];
            $controller = new self::$routes[$action];
            $controller->execute();
        } else {
            $home = self::$aliases["default"];
            $home = new self::$routes[$home];
            $home->execute();
        }
    }

    public function urlFor(string $name, array $params = []): string
    {

        $action = self::$aliases[$name];
        $url = $this->request->script_name . "?action=" . $action;


        if (isset($params)) {
            foreach ($params as $key => $param) {
                $url .= "&amp;" . $key . "=" . $param;
            }
        }

        return $url;
    }
}
