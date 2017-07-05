<?php

use yii\db\Migration;

class m130524_201442_init extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // user
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'role' => $this->string(20)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);
        $this->createIndex('index-user-status', 'user', 'status');
        $this->createIndex('index-user-username', 'user', 'username');
        $this->createIndex('index-user-email', 'user', 'email');

        // user metadata
        $this->createTable('{{%user_meta}}', [
            'user_id' => $this->integer()->notNull(),
            'meta_key' => $this->string()->notNull(),
            'meta_value' => $this->text(),
                ], $tableOptions);
        $this->addForeignKey('fk-user_meta-user_id', 'user_meta', 'user_id', 'user', 'id', 'CASCADE');
        $this->createIndex('index-user_meta-user_id', 'user_meta', 'user_id');
        $this->createIndex('index-user_meta-meta_key', 'user_meta', 'meta_key');

        
    }

    public function down() {
        
    }

}
