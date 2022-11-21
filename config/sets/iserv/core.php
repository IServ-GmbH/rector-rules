<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Rector\Renaming\ValueObject\RenameStaticMethod;

return static function (RectorConfig $rectorConfig): void {
    // Replace deprecated classes
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        // IServ
        'IServ\CoreBundle\Controller\PageController' => 'IServ\CoreBundle\Controller\AbstractPageController',
        'IServ\CoreBundle\Entity\GroupRepository' => 'IServ\CoreBundle\Repository\GroupRepository',
        'IServ\CoreBundle\Entity\LogRepository' => 'IServ\CoreBundle\Repository\LogRepository',
        'IServ\CoreBundle\Entity\MenuItemRepository' => 'IServ\CoreBundle\Repository\MenuItemRepository',
        'IServ\CoreBundle\Entity\NotificationRepository' => 'IServ\CoreBundle\Repository\NotificationRepository',
        'IServ\CoreBundle\Entity\PrivilegeRepository' => 'IServ\CoreBundle\Repository\PrivilegeRepository',
        'IServ\CoreBundle\Entity\UserRepository' => 'IServ\CoreBundle\Repository\UserRepository',
        'IServ\CoreBundle\Entity\DeletableInterface' => 'IServ\CrudBundle\Crud\Deletable\LegacyDeletableInterface',
        'IServ\CoreBundle\Entity\Specification\DeletedSpecification' => 'IServ\CrudBundle\Crud\Deletable\DeletedSpecification',
        'IServ\CoreBundle\Exception\TypeException' => 'IServ\Library\Common\Exception\TypeException',
        'IServ\CoreBundle\Form\Type\DeletedEntityType' => 'IServ\CrudBundle\Form\Type\DeletedEntityType',
        'IServ\CoreBundle\Form\Type\BooleanType' => 'IServ\Bundle\Form\Form\Type\BooleanType',
        'IServ\CoreBundle\Form\Type\ColorPickerType' => 'IServ\Bundle\Form\Form\Type\ColorPickerType',
        'IServ\CoreBundle\Form\Type\ComboboxType' => 'IServ\Bundle\Form\Form\Type\ComboboxType',
        'IServ\CoreBundle\Form\Type\GettextEntityType' => 'IServ\Bundle\Form\Form\Type\GettextEntityType',
        'IServ\CoreBundle\Form\Type\MacAddressType' => 'IServ\Bundle\Form\Form\Type\MacAddressType',
        'IServ\CoreBundle\Form\Type\PurifiedTextareaType' => 'IServ\Bundle\Form\Form\Type\PurifiedTextareaType',
        'IServ\CoreBundle\Form\Type\SearchType' => 'IServ\Bundle\Form\Form\Type\SearchType',
        'IServ\CoreBundle\Form\Type\TagsType' => 'IServ\Bundle\Form\Form\Type\TagsType',
        'IServ\CoreBundle\Service\ActAdm' => 'IServ\CoreBundle\Backend\ActAdm',
        'IServ\CoreBundle\Service\Config' => 'IServ\Library\Config\Config',
        'IServ\CoreBundle\Twig\BootstrapSettings' => 'IServ\BootstrapBundle\Twig\BootstrapSettings',
        'IServ\CoreBundle\Traits\PrivateConstructorTrait' => 'IServ\Library\Common\Traits\PrivateConstructorTrait',
        'IServ\CoreBundle\Util\Deletable' => 'IServ\CrudBundle\Crud\Deletable\Deletable',
        'IServ\CoreBundle\Util\Environment' => '\IServ\Library\Environment\Environment',
        'IServ\CoreBundle\Util\Quote' => 'IServ\Library\Common\Util\Quote',
        'IServ\CoreBundle\Util\Sort' => 'IServ\Library\Common\Util\Sort',
        'IServ\CoreBundle\Util\Text' => 'IServ\Library\Common\Util\Text',
        'IServ\CoreBundle\Validator\Constraints\BrowsableUrl' => 'IServ\Bundle\Form\Validator\Constraints\BrowsableUrl',
        // 3rd party
        'Braincrafted\Bundle\BootstrapBundle\Form\Type\BootstrapCollectionType' => 'IServ\BootstrapBundle\Form\Type\BootstrapCollectionType',
        'Braincrafted\Bundle\BootstrapBundle\Form\Type\FormActionsType' => 'IServ\BootstrapBundle\Form\Type\FormActionsType',
        'Braincrafted\Bundle\BootstrapBundle\Form\Type\FormStaticControlType' => 'IServ\BootstrapBundle\Form\Type\FormStaticControlType',
        'Braincrafted\Bundle\BootstrapBundle\Form\Type\MoneyType' => 'IServ\BootstrapBundle\Form\Type\MoneyType',
    ]);

    // Replace deprecated static method calls
    $rectorConfig->ruleWithConfiguration(RenameStaticMethodRector::class, [
        new RenameStaticMethod('IServ\CoreBundle\Util\Format', 'linkify', 'IServ\CoreBundle\Util\Linkify', 'format'),
        new RenameStaticMethod('IServ\CoreBundle\Util\File', 'streamPutContents', 'IServ\Library\Common\Util\File', 'streamPutContents'), // No rule for "quote" due to Quote in File usage
        new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'nowImmutable', 'IServ\Library\Zeit\Zeit', 'now'),
        new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'nowUtcImmutable', 'IServ\Library\Zeit\Zeit', 'nowUtc'),
        new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'createImmutable', 'IServ\Library\Zeit\Zeit', 'create'),
        new RenameStaticMethod('IServ\CoreBundle\Util\Date', 'createImmutableFromTimestamp', 'IServ\Library\Zeit\Zeit', 'createFromTimestamp'),
    ]);

    // Replace deprecated constants
    $rectorConfig->ruleWithConfiguration(RenameClassConstFetchRector::class, [
        new RenameClassAndConstFetch('IServ\CoreBundle\Twig\BootstrapSettings', 'FORM_BREAKPOINT', 'IServ\BootstrapBundle\Twig\BootstrapSettings', 'FORM_BREAKPOINT'),
        new RenameClassAndConstFetch('IServ\CoreBundle\Twig\BootstrapSettings', 'LABEL_COL_SIZE', 'IServ\BootstrapBundle\Twig\BootstrapSettings', 'LABEL_COL_SIZE'),
        new RenameClassAndConstFetch('IServ\CoreBundle\Twig\BootstrapSettings', 'WIDGET_COL_SIZE', 'IServ\BootstrapBundle\Twig\BootstrapSettings', 'WIDGET_COL_SIZE'),
        new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'DEFAULT_ICON_SIZE', 'IServ\CoreBundle\Service\IconRenderer', 'DEFAULT_ICON_SIZE'),
        new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'ICON_FUGUE', 'IServ\CoreBundle\Service\IconRenderer', 'ICON_FUGUE'),
        new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'ICON_ISERV', 'IServ\CoreBundle\Service\IconRenderer', 'ICON_ISERV'),
        new RenameClassAndConstFetch('IServ\CoreBundle\Twig\Extension\IServCoreExtension', 'ICON_LEGACY', 'IServ\CoreBundle\Service\IconRenderer', 'ICON_LEGACY'),
        new RenameClassAndConstFetch('IServ\CoreBundle\Entity\Role', 'DEFAULT_ROLE', 'IServ\CoreBundle\Entity\User', 'ROLE_DEFAULT'),
    ]);
};
