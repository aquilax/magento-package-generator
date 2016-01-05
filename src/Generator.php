<?php

namespace Aquilax\Magento;

class Generator
{

    public function getPackageXML(PackageConfig $config)
    {
        $xml = new \SimpleXMLElement('<package/>');
        $xml->addChild('name', $config->getName());
        $xml->addChild('version', $config->getVersion());
        $xml->addChild('stability', $config->getStability());
        $xml->addChild('license', $config->getLicense());
        $xml->addChild('channel', $config->getChannel());
        $xml->addChild('extends', $config->getExtends());
        $xml->addChild('summary', $config->getSummary());
        $xml->addChild('description', $config->getDescription());
        $xml->addChild('notes', $config->getNotes());
        $authors = $xml->addChild('authors');
        foreach ($config->getAuthors() as $singleAuthor) {
            $author = $authors->addChild('author');
            $author->addChild('name', $singleAuthor['name']);
            $author->addChild('user', $singleAuthor['user']);
            $author->addChild('email', $singleAuthor['email']);
        }
        $xml->addChild('date', date('Y-m-d', $config->getTime()));
        $xml->addChild('date', date('H:i:s', $config->getTime()));

        $contents = $php = $xml->addChild('contents');
        $this->addContents($contents, $config->getContent());
        $xml->addChild('compatible', $config->getCompatible());
        $dependencies = $xml->addChild('dependencies');
        $required = $dependencies->addChild('required');
        $php = $required->addChild('php');
        $php->addChild('min', $config->getPHPMinVersion());
        $php->addChild('max', $config->getPHPMaxVersion());
        return $xml->asXML();
    }

    protected function addContents(\SimpleXMLElement $xml, Array $contents)
    {
        foreach ($contents as $content) {
            $target = $xml->addChild('target');
            $target->addAttribute('name', $content['target']);
            if ($content['type'] === PackageConfig::TYPE_FILE) {
                $this->addFile($target, $content['path']);
                continue;
            }
            $this->addDirectory($target, $content['path']);
        }
    }

    protected function addFile($target, $path)
    {
        $file = $target->addChild('file');
        $file->addAttribute('name', basename($path));
        $file->addAttribute('hash', md5_file($path));
    }

    protected function addDirectory($target, $path)
    {
        $dir = $target->addChild('dir');
        $dir->addAttribute('name', basename($path));
        $list = scandir($path);
        foreach ($list as $file) {
            if ($file == "." || $file == "..") {
                continue;
            }
            $fullPath = $path . '/' . $file;
            if (is_dir($fullPath)) {
                $this->addDirectory($dir, $fullPath);
                continue;
            }
            $this->addFile($dir, $fullPath);
        }
    }
}
