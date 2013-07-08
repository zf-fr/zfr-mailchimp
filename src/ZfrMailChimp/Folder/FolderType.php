<?php
/**
 * Copyright (C) Maestrooo SAS - All Rights Reserved
 *
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 *
 * Written by Michaël Gallego <mic.gallego@gmail.com>
 */

namespace ZfrMailChimp\Folder;

/**
 * Simple enum for folder types
 *
 * @author Michaël Gallego
 */
class FolderType
{
    const CAMPAIGN       = 'campaign';
    const AUTO_RESPONDER = 'autoresponder';
    const TEMPLATE       = 'template';
}
