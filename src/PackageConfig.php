<?php

namespace Aquilax\Magento;

class PackageConfig
{

    const TYPE_DIRECTORY = 1;
    const TYPE_FILE = 2;

    const TARGET_LOCAL_MODULE_FILE = 'magelocal';
    const TARGET_COMMUNITY_MODULE_FILE = 'magecommunity';
    const TARGET_CORE_MODULE_FILE = 'magecore';
    const TARGET_USER_INTERFACE = 'magedesign';
    const TARGET_GLOBAL_CONFIGURATION = 'mageetc';
    const TARGET_PHP_LIBRARY = 'magelib';
    const TARGET_LOCALE_FILE = 'magelocale';
    const TARGET_MEDIA_LIBRARY = 'magemedia';
    const TARGET_THEME_SKIN = 'mageskin';
    const TARGET_WEB_FILE = 'mageweb';
    const TARGET_TEST_UNIT = 'magetest';
    const TARGET_OTHER = 'mage';

    protected $name = '';
    protected $version = '';
    protected $stability = '';
    protected $license = '';
    protected $channel = '';
    protected $extends = '';
    protected $summary = '';
    protected $description = '';
    protected $notes = '';
    protected $authors = array();
    protected $time = 0;
    protected $compatible = '';
    protected $content = array();
    protected $phpMin = '5.0.0';
    protected $phpMax = '5.7.0';

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setStability($stability)
    {
        $this->stability = $stability;
    }

    public function getStability()
    {
        return $this->stability;
    }

    public function setLicense($license)
    {
        $this->license = $license;
    }

    public function getLicense()
    {
        return $this->license;
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function setExtends($extends)
    {
        $this->extends = $extends;
    }

    public function getExtends()
    {
        return $this->extends;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function addAuthor($name, $user, $email)
    {
        $this->authors[] = array(
            'name' => $name,
            'user' => $user,
            'email' => $email,
        );
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setCompatible($compatible)
    {
        $this->compatible = $compatible;
    }

    public function getCompatible()
    {
        return $this->compatible;
    }

    public function addContent($target, $path, $type)
    {
        $this->content[] = array(
            'target' => $target,
            'path' => $path,
            'type' => $type,
        );
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setPHPDependency($minVersion, $maxVersion)
    {
        $this->phpMin = $minVersion;
        $this->phpMax = $maxVersion;
    }

    public function getPHPMinVersion()
    {
        return $this->phpMin;
    }

    public function getPHPMaxVersion()
    {
        return $this->phpMax;
    }
}
