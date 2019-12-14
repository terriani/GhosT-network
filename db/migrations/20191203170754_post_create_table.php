<?php


use Phinx\Migration\AbstractMigration;

class PostCreateTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other distructive changes will result in an error when trying to
     * rollback the migration.
     */
    public function change()
    {
        $this->table('posts')
        ->addColumn('title', 'string', ['null' => false, 'limit' => 60])
        ->addColumn('text', 'text', ['null' => false, 'limit' => 500])
        ->addColumn('img', 'string', ['null' => false])
        ->addColumn('likes', 'integer', ['null' => true])
        ->addColumn('created_at', 'timestamp', ['null' => false])
        ->addColumn('updated_at', 'timestamp', ['null' => false])
        ->create();
    }
}
