<?php

declare(strict_types=1);

use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(RenameClassConstFetchRector::class)
        ->call('configure', [[
            // Replace deprecated constants
            RenameClassConstFetchRector::CLASS_CONSTANT_RENAME => ValueObjectInliner::inline([
                new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'TEMPLATE_PAGE', 'TEMPLATE_PAGE', 'IServ\AdminBundle\Admin\Settings'),
                new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'TEMPLATE_BASE', 'TEMPLATE_BASE', 'IServ\AdminBundle\Admin\Settings'),
                new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'ROUTES_PREFIX', 'ROUTES_PREFIX', 'IServ\AdminBundle\Admin\Settings'),
                new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'ROUTES_NAME_PREFIX', 'ROUTES_NAME_PREFIX', 'IServ\AdminBundle\Admin\Settings'),
                new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'TEMPLATE_PAGE', 'TEMPLATE_PAGE', 'IServ\ManageBundle\Crud\Settings'),
                new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'TEMPLATE_BASE', 'TEMPLATE_BASE', 'IServ\ManageBundle\Crud\Settings'),
                new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'ROUTES_PREFIX', 'ROUTES_PREFIX', 'IServ\ManageBundle\Crud\Settings'),
                new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'ROUTES_NAME_PREFIX', 'ROUTES_NAME_PREFIX', 'IServ\ManageBundle\Crud\Settings'),
            ]),
        ]])
    ;
};
