<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });

        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('acquirers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('fxes', function (Blueprint $table) {
            $table->id();
            $table->decimal('original_amount');
            $table->char('original_currency', 3);
            $table->timestamps();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('expiry_month');
            $table->string('expiry_year');
            $table->string('start_month')->nullable();
            $table->string('start_year')->nullable();
            $table->string('issue_number')->nullable();
            $table->timestamps();
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->string('state')->nullable();
            $table->string('country');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->dateTime('birthday');
            $table->string('gender')->nullable();
            $table->foreignId('card_id')->references('id')->on('cards');
            $table->foreignId('billing_address_id')->references('id')->on('addresses')->rename('billing_address_id');
            $table->foreignId('shipping_address_id')->references('id')->on('addresses')->rename('shipping_address_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id', 32)->unique();
            $table->foreignId('merchant_id')->references('id')->on('merchants');
            $table->foreignId('acquirer_id')->references('id')->on('acquirers');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('fx_id')->references('id')->on('fxes');
            $table->string('reference_no')->nullable();
            $table->enum('status', ['WAITING', 'APPROVED', 'DECLINED', 'ERROR']);
            $table->enum('payment_method', ['CREDITCARD', 'CUP', 'IDEAL', 'GIROPAY', 'MISTERCASH', 'STORED', 'PAYTOCARD', 'CEPBANK', 'CITADEL']);
            $table->string('channel');
            $table->json('custom_data')->nullable();
            $table->string('chain_id');
            $table->string('agent_info_id');
            $table->enum('operation', ['DIRECT', 'REFUND', 'VOID', '3D', '3DAUTH']);
            $table->string('acquirer_transaction_id');
            $table->string('code');
            $table->string('message');
            $table->json('agent');
            $table->boolean('ipn')->default(true);
            $table->boolean('refundable')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('merchants');
        Schema::dropIfExists('acquirers');
        Schema::dropIfExists('fxs');
        Schema::dropIfExists('cards');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('transactions');
    }
};
