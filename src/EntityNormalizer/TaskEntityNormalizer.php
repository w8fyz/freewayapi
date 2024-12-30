<?php

namespace App\EntityNormalizer;

use App\Entity\Category;
use App\Entity\Task;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TaskEntityNormalizer implements NormalizerInterface
{
    public function normalize($object, string $format = null, array $context = []): array
    {
        if ($object instanceof Task) {
            $data = [
                'id' => $object->getId(),
                'title' => $object->getTitle(),
                'completed' => $object->isCompleted()
            ];

            if($object->getDetails()) {
                $data['details'] = $object->getDetails();
            }

            return $data;
        }

        return [];
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof Task;
    }
}
