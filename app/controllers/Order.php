<?php
class Order extends Controller{

    private $ordersModel;

    public function __construct()
    {
        $this->ordersModel = $this->model('OrdersModel');
    }

    public function index()
    {
       $orders  = $this->ordersModel->get();

       $this->view('orders/index',[
           'orders' => $orders
       ]);

    }

    public function import () 
    {
        if(isset($_POST['importSubmit'])){

            $file_name = $_FILES['file']['name'];
            $exp = explode('.', $file_name);
            $type = end($exp);
        
            if($type == "xml" && is_uploaded_file($_FILES['file']['tmp_name'])){
                $xml = simplexml_load_file($_FILES['file']['tmp_name']);
                if(!empty($xml)) {
                    foreach($xml as $order) {
                        $this->ordersModel->create($order->id_loja, $order->nome_loja, $order->localizacao, $order->produto, $order->quantidade);
                    }

                    $this->redirect('/order/index?msg=XML importado com sucesso!');
                } else {
                    $this->redirect('/order/index?msg=O arquivo enviado está vazio.');
                }
            } else {
                $this->redirect('/order/index?msg=Erro, algo deu errado!');
            }
        }

    }
}
?>