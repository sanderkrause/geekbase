<?php
declare(strict_types=1);

namespace App\Security\Voter;

use App\Entity\Game;
use App\Entity\User;
use App\Entity\UserOwned;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PrivateEntityVoter extends Voter
{
    public const EDIT = 'edit';
    public const REMOVE = 'remove';

    /**
     * @inheritDoc
     * @param string $attribute
     * @param mixed $subject
     * @return bool
     */
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, [self::EDIT, self::REMOVE]) && $subject instanceof Game;
    }

    /**
     * Vote
     * @param string $attribute
     * @param UserOwned $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof User) {
            return false;
        }

        // Check if user matches the subject's user
        switch ($attribute) {
            case self::EDIT:
            case self::REMOVE:
                return $subject->getUser() === $user;
        }

        return false;
    }
}
