<?php

namespace app\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $verifyCode;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['verifyCode', 'captcha', 'captchaAction' => '/user/captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
           // $user->status = User::STATUS_WAIT;
            $user->generateAuthKey();
           // $user->generateEmailConfirmToken();

            if ($user->save()) {
                Yii::$app->session->setFlash('success', "Вы успешно зарегистрированы на сайте!");
//                Yii::$app->mailer->compose('@app/mail/emailConfirm', ['user' => $user])
//                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
//                    ->setTo($this->email)
//                    ->setSubject('Email confirmation for ' . Yii::$app->name)
//                    ->send();
                return $user;
            }
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('db-label', 'username'),
            'password' => Yii::t('db-label', 'password'),
            'email' => Yii::t('db-label', 'email'),
            'verifyCode' => Yii::t('db-label', 'verifyCode'),

        ];
    }

}