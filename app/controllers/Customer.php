<?php
class Customer extends Controller{

    private $customerModel;

    public function __construct()
    {
        $this->customerModel = $this->model('CustomersModel');
    }

    public function index()
    {
       $customers  = $this->customerModel->get();

       $this->view('customers/index',[
           'customers' => $customers
       ]);

    }

    public function edit($id)
    {
       $customer  = $this->customerModel->findCustomerById($id);

       $this->view('customers/update',[
           'customer' => $customer[0]
       ]);

    }

    public function import()
    {
        if (isset($_POST['importSubmit'])) {

            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

            if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    $reader->setReadDataOnly(true);
                    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

                    $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
                    $data = $sheet->toArray();
                    unset($data[0]);
                    foreach($data as $item) {

                        $result = $this->customerModel->alreadyExists($item[2]);
    
                        if (!empty($result) && $result != null) {
        
                            $this->customerModel->update($item[0], $item[1], $item[2], $item[3], $item[4] , $item[5]);
        
                        } else {
        
                            $this->customerModel->create($item[1], $item[2], $item[3], $item[4] , $item[5]);
        
                        }
        
                    }
        
                    $returnMessage = 'Arquivo improtado com sucesso!';
        
                } else {
        
                    $returnMessage = 'Opss! Alguma coisa deu errado.';
        
                }
        
            } else {
        
                $returnMessage = 'Arquivo inválido.';
        
            }
        
        }
        
        $this->redirect('/?msg=' . $returnMessage);
     }

     public function update()
    {

        if (!isset($_POST['id'])) {
            $this->redirect('/?msg=Algo deu errado!');
        }

        $id = $_POST['id'];

        $findUser = $this->customerModel->findCustomerById($id);

        $update = $this->customerModel->update($id, $_POST['name'], $_POST['email'], $_POST['order_history'], $_POST['last_order'], $_POST['last_order_value']);
        if ($update) {
            $this->redirect('/?msg=Cliente atualizado com sucesso!');
        }

        $this->view('update', [
            'findUser' => $findUser
        ]);
    }

     public function delete($id)
     {
        $delete = $this->customerModel->delete($id);

        if($delete){
            $this->redirect('/?msg=Cliente excluído com sucesso!');
        }

        $this->redirect('/?msg=Algo deu errado!');
    }
}
?>