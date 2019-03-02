<?php
namespace T3\Dce\Components\ContentElementGenerator;

/*  | This extension is made for TYPO3 CMS and is licensed
 *  | under GNU General Public License.
 *  |
 *  | (c) 2012-2019 Armin Vieweg <armin@v.ieweg.de>
 */
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * DCE - Content Element Generator
 * Generates content elements in TYPO3 based on given DCE configuration.
 */
class Generator
{
    /**
     * @var InputDatabase
     */
    protected $inputDatabase;

    /**
     * @var OutputPlugin
     */
    protected $outputPlugin;

    /**
     * @var OutputTcaAndFlexForm
     */
    protected $outputTcaAndFlexForm;

    /**
     * Generator constructor
     */
    public function __construct()
    {
        $this->inputDatabase = GeneralUtility::makeInstance(InputDatabase::class);
        $this->outputPlugin = GeneralUtility::makeInstance(OutputPlugin::class, $this->inputDatabase);
        $this->outputTcaAndFlexForm = GeneralUtility::makeInstance(OutputTcaAndFlexForm::class, $this->inputDatabase);
    }

    /**
     * @return void
     */
    public function makeTca() : void
    {
        $this->outputTcaAndFlexForm->generate();
    }

    /**
     * @return void
     */
    public function makePluginConfiguration() : void
    {
        $this->outputPlugin->generate();
    }
}