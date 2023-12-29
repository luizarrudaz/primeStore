<?php
    // instancia de roteamento
    class RouterController {
       
        public function route() {
            // Obtém a URL solicitada
            $url = $_SERVER['REQUEST_URI'];
            
            // Mapeia URLs para controladores e ações
            $routes = [
                '/primeStore/' => ['controller' => 'home',  'action' => 'index'],
                '/primeStore/home' => ['controller' => 'home',  'action' => 'index'],
                '/primeStore/auth' => ['controller' => 'auth',  'action' => 'index'],
                '/primeStore/perfil' => ['controller' => 'perfil', 'action' => 'index'],
                '/primeStore/produtos' => ['controller' => 'produtos', 'action' => 'index'],
                '/primeStore/sobre' => ['controller' => 'sobre', 'action' => 'index'],
                '/primeStore/inputar' => ['controller' => 'inputar', 'action' => 'index'],
                '/primeStore/meuCarrinho_Logar' => ['controller' => 'meuCarrinho_Logar', 'action' => 'index'],
                '/primeStore/meuCarrinho' => ['controller' => 'meuCarrinho', 'action' => 'index'],
                '/primeStore/descricaoProdutos/{id}' => ['controller' => 'descricaoProdutos', 'action' => 'index'],
                '/primeStore/compraFinalizada' => ['controller' => 'compraFinalizada', 'action' => 'index']

            ];
    
            foreach ($routes as $route => $routeInfo) {
                // Use expressões regulares para fazer a correspondência da rota
                $pattern = preg_replace('/\/{([^\/]+)}/', '/([^\/]+)', $route);
                $pattern = "@^" . $pattern . "$@";
                
                if (preg_match($pattern, $url, $matches)) {
                    // Remove o primeiro elemento de $matches, que é a URL completa
                    array_shift($matches);
                    
                    // Obtém o controlador e a ação
                    $controllerName = $routeInfo['controller'];
                    $actionName = $routeInfo['action'];
    
                    // Inclui o arquivo do controlador
                    include_once './app/controllers/' . $controllerName . '/index.php';
    
                    // Cria uma instância do controlador
                    $controller = new $controllerName();
    
                    // Chama a ação e passa os parâmetros
                    call_user_func_array([$controller, $actionName], $matches);
    
                    return; 
                }
            }
    
            // Rota não encontrada
            echo "Rota não encontrada.";
            
         }
    }
    
?>