<?php
namespace Reminder\Controller;
use Reminder\Model\ReminderTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class ReminderController extends AbstractActionController
{
    private $table;

    public function __construct(ReminderTable $table){
        $this->table = $table ;
    }
    
    public function indexAction()
    {
    	return new ViewModel([
            'reminders'=>$this->table->fetchAll(),]);
    }

    public function addAction()
    {
        $form = new ReminderForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $reminder = new Reminder();
        $form->setInputFilter($reminder->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $reminder->exchangeArray($form->getData());
        $this->table->saveReminder($reminder);
        return $this->redirect()->toRoute('reminder');
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}