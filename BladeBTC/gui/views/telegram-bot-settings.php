<?php
require $_SERVER['DOCUMENT_ROOT'] . '/gui/views/partials/header.php';

use BladeBTC\GUI\Controllers\ManageBotSetting;
use BladeBTC\GUI\Helpers\Messages;
use BladeBTC\GUI\Helpers\Path;
use BladeBTC\GUI\Helpers\Request;
use BladeBTC\GUI\Helpers\Session;
use BladeBTC\GUI\Models\BotSettingModel;

?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1 id="module">Settings (Bot)</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo Path::module(); ?>/telegram-bot-settings.php"><i class="fa fa-dashboard"></i>Settings
                        (Bot)</a>
                </li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (!is_null(Request::post('save-bot-setting')) && Session::getFormId('mng-bot-setting') == Request::post('DBLP')) {
                        try {
                            if (ManageBotSetting::edit()) {
                                Messages::success("The bot settings has been saved.");
                            }
                        } catch (Exception $e) {
                            Messages::error($e->getMessage());
                        }
                    }
                    ?>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Settings</h3>
                        </div>

                        <div class="box-body">

                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <form action="<?php echo Path::module() ?>/telegram-bot-settings.php"
                                          method="post">
                                        <input type="hidden" name="DBLP"
                                               value="<?php echo Session::setFormId('mng-bot-setting'); ?>">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Telegram Application ID</label>
                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <input class="form-control" name="app_id" type="text"
                                                           value="<?php echo BotSettingModel::getValueByName("app_id"); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Telegram Application Name</label>
                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span>
                                                    <input class="form-control pointer" name="app_name"
                                                           type="text"
                                                           value="<?php echo BotSettingModel::getValueByName("app_name"); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Telegram Support Chat ID</label>
                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-tag"></i></span>
                                                    <input class="form-control" name="support_chat_id" type="text"
                                                           value="<?php echo BotSettingModel::getValueByName("support_chat_id"); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Blockchain Wallet ID</label>
                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-tag"></i></span>
                                                    <input class="form-control" name="wallet_id" type="text"
                                                           value="<?php echo BotSettingModel::getValueByName("wallet_id"); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Blockchain Wallet Password</label>
                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-key"></i></span>
                                                    <input class="form-control" name="wallet_password" type="password"
                                                           value="<?php echo BotSettingModel::getValueByName("wallet_password"); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Blockchain Wallet Second Password</label>
                                                <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-key"></i></span>
                                                    <input class="form-control" name="wallet_second_password"
                                                           type="password"
                                                           value="<?php echo BotSettingModel::getValueByName("wallet_second_password"); ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <br/>

                                        <input class="btn btn-success" type="submit" name="save-bot-setting"
                                               value="Save">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/gui/views/partials/footer.php';