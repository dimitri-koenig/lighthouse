<?php

namespace Nuwave\Lighthouse\Schema\Directives\Fields;

use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;

class AuthDirective extends BaseFieldDirective implements FieldResolver
{
    /**
     * Name of the directive.
     *
     * @return string
     */
    public function name()
    {
        return 'auth';
    }

    /**
     * Resolve the field directive.
     *
     * @param FieldValue $value
     *
     * @return FieldValue
     */
    public function resolveField(FieldValue $value)
    {
        $guard = $this->associatedArgValue('name');

        return $value->setResolver(function () use ($guard) {
            return auth($guard)->user();
        });
    }
}
