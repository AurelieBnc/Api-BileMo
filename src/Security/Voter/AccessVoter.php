<?php

namespace App\Security\Voter;

use App\Entity\Customer;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AccessVoter extends Voter
{
    public const CREATE = 'CUSTOMER_CREATE';
    public const DELETE = 'CUSTOMER_DELETE';
    public const LIST = 'CUSTOMER_LIST';
    public const DETAIL = 'CUSTOMER_DETAIL';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return
        in_array($attribute, [self::CREATE, self::LIST]) ||
        (
            in_array($attribute, [self::DETAIL, self::DELETE])
            && $subject instanceof Customer
        );
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return false;
        }

        switch ($attribute) {
            case self::DELETE:
            case self::DETAIL:
                $checkIdUser = $subject?->getUser()->getUserIdentifier() === $user->getUserIdentifier();
                return $checkIdUser ? $checkIdUser : throw new AccessDeniedException("Utilisateur introuvable chez ". $user->getUsername());
                break;
            case self::LIST:
            case self::CREATE:
                return true;
                break;
        }

        return false;
    }
}
