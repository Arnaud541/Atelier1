<?php


namespace MediaPhoto\galleryapp\auth;


use MediaPhoto\galleryapp\model\User;
use MediaPhoto\mf\auth\AbstractAuthentification;
use MediaPhoto\mf\exceptions\AuthentificationException;
use MediaPhoto\mf\router\Router;
use MediaPhoto\mf\utils\HttpRequest;

class MediaPhotoAuthentification extends AbstractAuthentification
{

    public static function register(string $pseudo, string $password, string $firstname, string $lastname): void
    {
        if (User::where('pseudo', $pseudo)->exists()) {
            //throw new AuthentificationException("Un utilisateur existe déjà avec ce nom d'utilisateur.");
        } else {
            $user = new User();
            $user->pseudo = $pseudo;
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->password = self::makePassword($password);
            $user->save();
        }
    }

    public static function login(string $pseudo, string $password): bool
    {

        $user = User::where('pseudo', $pseudo)->first();
        if ($user) {
            self::checkPassword($password, $user->password, $user->id);
            return true;
        } else {
            // throw new AuthentificationException("Erreur d'authentification");
            return false;
        }
    }
}
