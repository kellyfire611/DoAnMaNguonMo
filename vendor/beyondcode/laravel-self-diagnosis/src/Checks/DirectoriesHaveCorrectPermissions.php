<?php

namespace BeyondCode\SelfDiagnosis\Checks;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;

class DirectoriesHaveCorrectPermissions implements Check
{
    /** @var Filesystem */
    private $filesystem;

    /** @var Collection */
    private $paths;

    /**
     * DirectoriesHaveCorrectPermissions constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * The name of the check.
     *
     * @param array $config
     * @return string
     */
    public function name(array $config): string
    {
        return trans('self-diagnosis::checks.directories_have_correct_permissions.name');
    }

    /**
     * The error message to display in case the check does not pass.
     *
     * @param array $config
     * @return string
     */
    public function message(array $config): string
    {
        return trans('self-diagnosis::checks.directories_have_correct_permissions.message', [
            'directories' => $this->paths->implode(PHP_EOL),
        ]);
    }

    /**
     * Perform the actual verification of this check.
     *
     * @param array $config
     * @return bool
     */
    public function check(array $config): bool
    {
        $this->paths = Collection::make(Arr::get($config, 'directories', []));

        $this->paths = $this->paths->reject(function ($path) {
            return $this->filesystem->isWritable($path);
        });

        return $this->paths->isEmpty();
    }
}
