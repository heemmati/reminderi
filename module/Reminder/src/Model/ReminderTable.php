<?php
namespace Reminder\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ReminderTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getReminder($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveReminder(Reminder $reminder)
    {
        $data = [
            'email' => $reminder->email,
            'username'  => $reminder->username,
            'firstname' => $reminder->firstname,
            'lastname'  => $reminder->lastname,
            'bio' => $reminder->bio,
            'password'  => $reminder->password,
            'birthdate' => $reminder->birthdate,
            'gennder'  => $reminder->gennder,
            'country' => $reminder->country,
            'city'  => $reminder->city,
           
        ];

        $id = (int) $reminder->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getReminder($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update reminder with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteReminder($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}