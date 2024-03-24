<?php
class Message extends Controller{

    private $mailsModel;
    private $customerModel;

    public function __construct()
    {
        $this->mailsModel = $this->model('MailsModel');
        $this->customerModel = $this->model('CustomersModel');
    }

    public function index()
    {
       $mails  = $this->mailsModel->get();

       $this->view('mails/index',[
           'mails' => $mails
       ]);

    }

    public function show ($id)
    {
       $mail  = $this->mailsModel->findEmailById($id);

       $this->view('mails/show',[
           'mail' => $mail[0]
       ]);

    }

    public function write($destination = false)
    {
        $customer[0] = '';

        if(!empty($destination)) {

            $customer  = $this->customerModel->getByMail($destination);

            if(!$customer) {
                $this->redirect('/?msg=E-mail não encontrado!');
            }
        }

        $this->view('mails/send',[
            'customer' => $customer[0]
        ]);
    }

    function send () 
    {
        $date = date('Y-m-d H:i:s');
        $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $destination = isset($_POST['destination']) ? $_POST['destination'] : '';

        if (empty($subject) || empty($content) || empty($destination)) {
            $this->redirect('/message/send?msg=Todos os campos são obrigatórios!');
        }

        $sendMail = $this->sendMail($destination, $subject, $content);
        if($sendMail) {
            $this->mailsModel->create($subject, $content, $destination, $date);
            $this->redirect('/message/index?msg=E-mail enviado com sucesso!');
        } else {
            $this->redirect('/message/index?msg=Ops, e-mail não enviado.');
        }
    }

     public function delete($id)
     {
        $delete = $this->mailsModel->delete($id);

        if($delete){
            $this->redirect('/message/index?msg=Email excluído com sucesso!');
        }

        $this->redirect('/message/index?msg=Algo deu errado!');
    }
}
?>