<?php declare(strict_types=1);

namespace Yireo\DumpCmsContent\Writer;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem;

class DumpWriter
{
    /**
     * @var DirectoryList
     */
    private $directoryList;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * DumpWriter constructor.
     * @param DirectoryList $directoryList
     * @param Filesystem $filesystem
     */
    public function __construct(
        DirectoryList $directoryList,
        Filesystem $filesystem
    )
    {
        $this->directoryList = $directoryList;
        $this->filesystem = $filesystem;
    }

    /**
     * @param string $id
     * @param string $content
     * @throws FileSystemException
     */
    public function writeContent(string $id, string $content)
    {
        $appDirectory = $this->filesystem->getDirectoryWrite(DirectoryList::APP);
        $path = $this->directoryList->getPath('app');
        $theme_dir = '/design/frontend/Aonach/hyva/web'; // Point it to the usual Aonach/hyva theme
        $appDirectory->writeFile($path.$theme_dir.'/cms-output/'.$id.'.html', $content);
    }
}
