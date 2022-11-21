<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(RenameClassConstFetchRector::class, [
        // Replace deprecated constants
        new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'TEMPLATE_PAGE', 'IServ\AdminBundle\Admin\Settings', 'TEMPLATE_PAGE'),
        new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'TEMPLATE_BASE', 'IServ\AdminBundle\Admin\Settings', 'TEMPLATE_BASE'),
        new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'ROUTES_PREFIX', 'IServ\AdminBundle\Admin\Settings', 'ROUTES_PREFIX'),
        new RenameClassAndConstFetch('IServ\AdminBundle\Admin\AbstractAdmin', 'ROUTES_NAME_PREFIX', 'IServ\AdminBundle\Admin\Settings', 'ROUTES_NAME_PREFIX'),
        new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'TEMPLATE_PAGE', 'IServ\ManageBundle\Crud\Settings', 'TEMPLATE_PAGE'),
        new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'TEMPLATE_BASE', 'IServ\ManageBundle\Crud\Settings', 'TEMPLATE_BASE'),
        new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'ROUTES_PREFIX', 'IServ\ManageBundle\Crud\Settings', 'ROUTES_PREFIX'),
        new RenameClassAndConstFetch('IServ\ManageBundle\Crud\AbstractManage', 'ROUTES_NAME_PREFIX', 'IServ\ManageBundle\Crud\Settings', 'ROUTES_NAME_PREFIX'),
    ]);
};
