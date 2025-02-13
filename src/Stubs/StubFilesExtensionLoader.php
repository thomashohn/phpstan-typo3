<?php declare(strict_types = 1);

namespace SaschaEgerer\PhpstanTypo3\Stubs;

use Composer\Semver\VersionParser;
use TYPO3\CMS\Core\Information\Typo3Version;

class StubFilesExtensionLoader implements \PHPStan\PhpDoc\StubFilesExtension
{

	public function getFiles(): array
	{
		$stubsDir = dirname(__DIR__, 2) . '/stubs';
		$files = [];
		$typo3Version = new Typo3Version();
		$versionParser = new VersionParser();

		if ($versionParser->parseConstraints($typo3Version->getVersion())->matches($versionParser->parseConstraints('< 12'))) {
			$files[] = $stubsDir . '/GeneralUtility.stub';
		}
		if ($versionParser->parseConstraints($typo3Version->getVersion())->matches($versionParser->parseConstraints('<= 12.2.0'))) {
			$files[] = $stubsDir . '/QueryResult.stub';
		}

		return $files;
	}

}
