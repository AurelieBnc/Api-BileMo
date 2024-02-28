<?php

namespace App\Security\Voter;

use App\Entity\Customer;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AccessVoter extends Voter
{
    public const CREATE = 'CUSTOMER_POST';
    public const DELETE = 'CUSTOMER_DELETE';
    public const LIST = 'CUSTOMER_LIST';
    public const VIEW = 'CUSTOMER_VIEW';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return
        in_array($attribute, [self::CREATE, self::LIST]) ||
        (
            in_array($attribute, [self::VIEW, self::DELETE])
            && $subject instanceof Customer
        );
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return false;
        }

        if ($subject->getUser()->getUserIdentifier() !== $user->getUserIdentifier()) {
            throw new AccessDeniedException("Utilisateur introuvable chez ". $user->getUserIdentifier());
        }

        switch ($attribute) {
            case self::CREATE:
            case self::DELETE:
            case self::LIST:
            case self::VIEW:
                return true;
                break;
        }

        return false;
    }
}
