<?php

namespace Library;

class Notifications
{
    private $_messages = [];
    private $_user;

    public function __construct($user)
    {
        $this->_user = $user;

        if (empty($user->tel))
            array_push($this->_messages, [
                'title' => 'Ajoutez votre numéro de téléphone',
                'message' => 'Nous ne donnons votre numéro de téléphone qu\'aux personnes ayant valider une réservation sur l\'un de vos trajets, ils pourront comme ça vous contacter en cas de problème.'
            ]);
        if (empty($user->minibio))
            array_push($this->_messages, [
                'title' => 'Rédigez une minibio',
                'message' => 'Présentez-vous aux autres membres, tout le monde préfère voyager avec une personne qui a pris le temps de se présenter.'
            ]);
        if (empty($user->car) && $user->status == 1)
            array_push($this->_messages, [
                'title' => 'Ajoutez votre véhicule',
                'message' => 'Ajoutez une photo de votre véhicule, comme ça les passagers vous retrouveront plus facilement le jour du trajet. Les passagers aiment savoir dans quel véhicule ils vont voyager.'
            ]);
        if (empty($user->image))
            array_push($this->_messages, [
                'title' => 'Ajoutez une photo',
                'message' => 'Voir avec qui ils vont voyager rassure les membres.'
            ]);
        if (empty($user->prefs))
            array_push($this->_messages, [
                'title' => 'Renseignez vos préférences',
                'message' => 'Tout le monde préfère voyager avec une personne qui a pris le temps de renseigner ses préférences pour passer un meilleur trajet.'
            ]);
    }

    /**
     * Count notifications
     * @return int|integer
     */
    public function count(): int
    {
        return count($this->_messages);
    }

    /**
     * Get all notifications message
     * @return array
     */
    public function get(): array
    {
        return $this->_messages;
    }
}