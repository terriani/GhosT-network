<?php

use Phinx\Migration\AbstractMigration;

class CreateUserAuth extends AbstractMigration
{
    /**
     * Migration criada - Via Scooby_CLI.
     */
    public function change()
    {
        $this->Table('users')
        ->addColumn('name', 'string', ['null' => false])
        ->addColumn('email', 'string', ['null' => false])
        ->addColumn('password', 'string', ['null' => false])
        ->create();
    }

}
