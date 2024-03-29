SignatureModule
==========
This signature module is a ZF2 module which provides js libraries and services required to capture a signature.

To use the module you should include it as a composer dependency.

    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:kkucera/SignatureModule.git"
        }
    ],
    "require": {
        "kkucera/SignatureModule": "dev-master"
    }

The module is setup to be able to serve is assets from with in the module.  In order to do this it uses and has a dependency on the AssetManager (https://github.com/RWOverdijk/AssetManager) module.

The hosting application must register the dependent modules in it's application config.
You must register both the AssetManager and the SignatureModule.

    return array(
        'modules' => array(
            'AssetManager',
            'Application',
            // ... other modules,
            'SignatureModules',
        ),
    );

This module uses this Javascript library: http://thomasjbradley.ca/lab/signature-pad