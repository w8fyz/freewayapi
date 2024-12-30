<?php

namespace App\EntityNormalizer;

use App\Entity\Category;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CategoryEntityNormalizer implements NormalizerInterface
{
    public function normalize($object, string $format = null, array $context = []): array
    {
        if ($object instanceof Category) {
            $data = [
                'id' => $object->getId(),
                'name' => $object->getName(),
            ];

            if ($object->getTasks()) {
                $tasks = [];
                foreach ($object->getTasks() as $task) {
                    $taskData = [
                        'id' => $task->getId(),
                        'title' => $task->getTitle(),
                        'details' => $task->getDetails(),
                        'completed' => $task->isCompleted(),
                        // Add other fields you want to include
                    ];
                    $tasks[] = $taskData;
                }
                $data['tasks'] = $tasks;
            }

            return $data;
        }

        return [
            'error' => 'Category not found'
        ];
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof Category;
    }
}
