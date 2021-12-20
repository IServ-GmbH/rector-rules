<?php

declare(strict_types=1);

use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    // Add replacement of deprecated classes
    $services->set(RenameClassRector::class)
        ->call('configure', [[
            // Replace deprecated classes
            RenameClassRector::OLD_TO_NEW_CLASSES => [
                // IServ
                'IServ\CoreBundle\Controller\PageController' => 'IServ\CoreBundle\Controller\AbstractPageController',
                'IServ\CoreBundle\Entity\GroupRepository' => 'IServ\CoreBundle\Repository\GroupRepository',
                'IServ\CoreBundle\Entity\LogRepository' => 'IServ\CoreBundle\Repository\LogRepository',
                'IServ\CoreBundle\Entity\MenuItemRepository' => 'IServ\CoreBundle\Repository\MenuItemRepository',
                'IServ\CoreBundle\Entity\NotificationRepository' => 'IServ\CoreBundle\Repository\NotificationRepository',
                'IServ\CoreBundle\Entity\PrivilegeRepository' => 'IServ\CoreBundle\Repository\PrivilegeRepository',
                'IServ\CoreBundle\Entity\UserRepository' => 'IServ\CoreBundle\Repository\UserRepository',
                'IServ\CoreBundle\Exception\TypeException' => 'IServ\Library\Common\Exception\TypeException',
                'IServ\CoreBundle\Form\Type\DeletedEntityType' => 'IServ\CrudBundle\Form\Type\DeletedEntityType',
                'IServ\CoreBundle\Service\ActAdm' => 'IServ\CoreBundle\Backend\ActAdm',
                'IServ\CoreBundle\Service\Config' => 'IServ\Library\Config\Config',
                'IServ\CoreBundle\Twig\BootstrapSettings' => 'IServ\BootstrapBundle\Twig\BootstrapSettings',
                'IServ\CoreBundle\Traits\PrivateConstructorTrait' => 'IServ\Library\Common\Traits\PrivateConstructorTrait',
                'IServ\CoreBundle\Util\Deletable' => 'IServ\CrudBundle\Crud\Deletable\Deletable',
                'IServ\CoreBundle\Util\Quote' => 'IServ\Library\Common\Util\Quote',
                'IServ\CoreBundle\Util\Sort' => 'IServ\Library\Common\Util\Sort',
                'IServ\CoreBundle\Util\Text' => 'IServ\Library\Common\Util\Text',
                'Braincrafted\Bundle\BootstrapBundle\Form\Type\BootstrapCollectionType' => 'IServ\BootstrapBundle\Form\Type\BootstrapCollectionType',
                'Braincrafted\Bundle\BootstrapBundle\Form\Type\FormActionsType' => 'IServ\BootstrapBundle\Form\Type\FormActionsType',
                'Braincrafted\Bundle\BootstrapBundle\Form\Type\FormStaticControlType' => 'IServ\BootstrapBundle\Form\Type\FormStaticControlType',
                'Braincrafted\Bundle\BootstrapBundle\Form\Type\MoneyType' => 'IServ\BootstrapBundle\Form\Type\MoneyType',
            ],
        ]])
    ;

    $services->set(RenameStaticMethodRector::class)
        ->call('configure', [[
            // Replace deprecated static method calls
            RenameStaticMethodRector::OLD_TO_NEW_METHODS_BY_CLASSES => ValueObjectInliner::inline([
                new RenameStaticMethod('IServ\CoreBundle\Util\Format', 'linkify', 'IServ\CoreBundle\Util\Linkify', 'format'),
                new RenameStaticMethod('IServ\CoreBundle\Util\File', 'streamPutContents', 'IServ\Library\Common\Util\File', 'streamPutContents'), // No rule for "quote" due to Quote in File usage
                new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'nowImmutable', 'IServ\Library\Zeit\Zeit', 'now'),
                new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'nowUtcImmutable', 'IServ\Library\Zeit\Zeit', 'nowUtc'),
                new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'createImmutable', 'IServ\Library\Zeit\Zeit', 'create'),
                new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'createImmutableFromTimestamp', 'IServ\Library\Zeit\Zeit', 'createFromTimestamp'),
            ]),
        ]])
    ;

    $services->set(RenameClassConstFetchRector::class)
        ->call('configure', [[
            // Replace deprecated constants
            RenameClassConstFetchRector::CLASS_CONSTANT_RENAME => ValueObjectInliner::inline([
                new RenameClassAndConstFetch('IServ\CoreBundle\Twig\BootstrapSettings', 'FORM_BREAKPOINT', 'FORM_BREAKPOINT', 'IServ\BootstrapBundle\Twig\BootstrapSettings'),
                new RenameClassAndConstFetch('IServ\CoreBundle\Twig\BootstrapSettings', 'LABEL_COL_SIZE', 'LABEL_COL_SIZE', 'IServ\BootstrapBundle\Twig\BootstrapSettings'),
                new RenameClassAndConstFetch('IServ\CoreBundle\Twig\BootstrapSettings', 'WIDGET_COL_SIZE', 'WIDGET_COL_SIZE', 'IServ\BootstrapBundle\Twig\BootstrapSettings'),
                new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'DEFAULT_ICON_SIZE', 'DEFAULT_ICON_SIZE', 'IServ\CoreBundle\Service\IconRenderer'),
                new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'ICON_FUGUE', 'ICON_FUGUE', 'IServ\CoreBundle\Service\IconRenderer'),
                new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'ICON_ISERV', 'ICON_ISERV', 'IServ\CoreBundle\Service\IconRenderer'),
                new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'ICON_LEGACY', 'ICON_LEGACY', 'IServ\CoreBundle\Service\IconRenderer'),
                new RenameClassAndConstFetch('IServ\CoreBundle\Entity\Role', 'DEFAULT_ROLE', 'ROLE_DEFAULT', 'IServ\CoreBundle\Entity\User'),
            ]),
        ]])
    ;
};
