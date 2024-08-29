<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faqs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'question' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'answer' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faqs');
        $init_data = [
            [
                'question'     => 'Who i will participate in Sitename',
                'answer'      => 'Any person or corporation from any country can register an account with us and we will be glad to accept investors from anywhere in the world.',
            ],
            [
                'question'     => 'What I need join to Sitename?',
                'answer'      => 'Starting with Sitename is very simple → just create an account on our platform. Creating an account takes no longer than 1 minute and gives you access to our project.',
            ],
            [
                'question'     => 'How to make a deposit?',
                'answer'      => 'To create a deposit, you need to be a registered user, go to the dashboard and click the "DEPOSIT" button, then follow all the relevant instructions that are described in this section. After the transaction, the deposit will be credited within 5 minutes and your plan will be activated as soon as the funds arrive in your account.',
            ],
            [
                'question'     => 'I already have an activated deposit, I want to make more, what should I do?',
                'answer'      => 'You can activate an additional deposit at any time, make a new deposit in the dashboard and the new deposit will be activated.',
            ],
            [
                'question'     => 'What currencies are currently accepted?',
                'answer'      => 'We currently accept: Tron (TRX), Dogecoin (DOGE), Bitcoin (BTC), Bitcoin cash (BCH), Litecoin (LTC), Ethereum (ETH), Dash coin (Dash), Binance (BNB), Tether TRC-20 (USDT).',
            ],
            [
                'question'     => 'What is the minimum deposit amount?',
                'answer'      => 'The minimum deposit is only 10 Tron (TRX).',
            ],
            [
                'question'     => 'How long does it take to activate the deposit after sending funds?',
                'answer'      => 'Your deposit will be automatically activated after it will be confirmed in Tron (TRX) network. Please keep in mind that we cannot influence the speed of confirmation. Usually it takes to 5 minutes.',
            ],
            [
                'question'     => 'What is the minimum withdrawal amount?',
                'answer'      => 'The minimum withdrawal amount is 10 Tron (TRX).',
            ],
            [
                'question'     => 'How long do you process the withdrawal of funds?',
                'answer'      => 'Withdrawal of funds is processing for 5 minutes since submitting a request.',
            ],
            [
                'question'     => 'Are there any fees for withdrawals?',
                'answer'      => 'The project undertakes commissions for all transactions',
            ],
            [
                'question'     => 'Can I combine earnings from different deposits for withdrawal?',
                'answer'      => 'Yes, you can combine earnings from every deposit and withdraw it just in one transaction.',
            ],
            [
                'question'     => 'How does the affiliate program work?',
                'answer'      => 'You get 12% for each deposit of invited referrals. The size and number of referral rewards is unlimited.',
            ],
            [
                'question'     => 'Where can I find my invitation link?',
                'answer'      => 'You can find the invitation link in the "Referrals" section.',
            ],
            [
                'question'     => 'Can I participate in the referral program without my own active deposit?',
                'answer'      => 'Yes, you can access all the features of our affiliate program regardless of whether you have a deposit or not.',
            ],
            [
                'question'     => 'Where can I get answers to questions that are not covered here?',
                'answer'      => 'Our technical support works 24/7. You can contact our support personnel any moment from LiveChat or Telegram: news_Sitename',
            ],

        ];
        $this->db->table('faqs')->insertBatch($init_data);
    }

    public function down()
    {
        $this->forge->dropTable('faqs');
    }
}
