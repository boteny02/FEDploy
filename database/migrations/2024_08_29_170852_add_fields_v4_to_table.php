<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('id_card_settings', 'prefix')) {
            Schema::table('id_card_settings', function (Blueprint $table) {
                $table->string('prefix')->nullable();
            });
        }

        if (!Schema::hasColumn('print_settings', 'prefix')) {
            Schema::table('print_settings', function (Blueprint $table) {
                $table->string('prefix')->nullable();
            });
        }

        if (!Schema::hasColumn('students', 'school_transcript')) {
            Schema::table('students', function (Blueprint $table) {
                $table->string('school_transcript')->nullable();
                $table->string('school_certificate')->nullable();
                $table->string('collage_transcript')->nullable();
                $table->string('collage_certificate')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'school_transcript')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('school_transcript')->nullable();
                $table->string('school_certificate')->nullable();
                $table->string('collage_transcript')->nullable();
                $table->string('collage_certificate')->nullable();
                $table->double('fee_amount', 10, 2)->nullable();
                $table->tinyInteger('pay_status')->default('0')->comment('0 Unpaid, 1 Paid, 2 Cancel');
                $table->integer('payment_method')->nullable();
            });
        }

        if (!Schema::hasColumn('application_settings', 'fee_amount')) {
            Schema::table('application_settings', function (Blueprint $table) {
                $table->double('fee_amount', 10, 2)->nullable();
                $table->boolean('pay_online')->default('1')->comment('0 No, 1 Yes');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('id_card_settings', 'prefix')) {
            Schema::table('id_card_settings', function (Blueprint $table) {
                $table->dropColumn('prefix');
            });
        }

        if (Schema::hasColumn('print_settings', 'prefix')) {
            Schema::table('print_settings', function (Blueprint $table) {
                $table->dropColumn('prefix');
            });
        }

        if (Schema::hasColumn('students', 'school_transcript')) {
            Schema::table('students', function (Blueprint $table) {
                $table->dropColumn('school_transcript');
                $table->dropColumn('school_certificate');
                $table->dropColumn('collage_transcript');
                $table->dropColumn('collage_certificate');
            });
        }

        if (Schema::hasColumn('applications', 'school_transcript')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->dropColumn('school_transcript');
                $table->dropColumn('school_certificate');
                $table->dropColumn('collage_transcript');
                $table->dropColumn('collage_certificate');
                $table->dropColumn('fee_amount');
                $table->dropColumn('pay_status');
                $table->dropColumn('payment_method');
            });
        }

        if (Schema::hasColumn('application_settings', 'fee_amount')) {
            Schema::table('application_settings', function (Blueprint $table) {
                $table->dropColumn('fee_amount');
                $table->dropColumn('pay_online');
            });
        }
    }
};
