<?php
declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\AutoCreateable;
use App\Service\AutoCreateSubscriberFactory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Exception\InvalidConfigurationException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class AutoCompleteType extends AbstractType
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var AutoCreateSubscriberFactory
     */
    private $subscriberFactory;

    public function __construct(UrlGeneratorInterface $router, AutoCreateSubscriberFactory $subscriberFactory)
    {
        $this->router = $router;
        $this->subscriberFactory = $subscriberFactory;
    }

    public function getParent(): ?string
    {
        return EntityType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'placeholder' => 'Select existing or create a new one',
            'attr' => [
                // Enables automatically configuring Select2
                'data-autocomplete' => 'true',
                // Configure Select2 with data-* attributes
                // See https://select2.org/configuration/data-attributes
            ],
            // @todo for future expansion: enable Select2's AJAX capabilities
            'autocomplete_route' => null,
            'autocomplete_url' => null,
            'autocomplete_callable' => null,
        ]);

        $resolver->addNormalizer('class', static function (Options $options, $value) {
            if (!class_exists($value, true) || !in_array(AutoCreateable::class, class_implements($value, true), true)) {
                throw new InvalidConfigurationException("${value} does not implement " . AutoCreateable::class);
            }
            return $value;
        });

        $resolver->setAllowedTypes('autocomplete_route', ['string', 'null']);
        $resolver->addNormalizer('autocomplete_route', function (Options $options, $value) {
            if ($value !== null) {
                try {
                    $url = $this->router->generate($value, [], UrlGeneratorInterface::ABSOLUTE_URL);
                } catch (RouteNotFoundException $e) {
                    throw new InvalidConfigurationException("'${value}' is not a valid route");
                }
                return $url;
            }
            return null;
        });

        $resolver->setAllowedTypes('autocomplete_url', ['string', 'null']);
        $resolver->addNormalizer('autocomplete_url', static function (Options $options, $value) {
            if ($value !== null) {
                $value = filter_var($value, FILTER_SANITIZE_URL);
                if (!filter_var($value, FILTER_VALIDATE_URL, ['flags' => FILTER_FLAG_SCHEME_REQUIRED])) {
                    throw new InvalidConfigurationException("'${value}' is not a valid URL");
                }
            }
            return $value;
        });
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber($this->subscriberFactory->createSubscriber($options['class']));
    }
}