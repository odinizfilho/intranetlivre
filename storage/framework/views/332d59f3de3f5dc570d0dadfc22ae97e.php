<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Lista de setor')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Código do setor</th>
                                <th class="px-4 py-2">Nome</th>
                                <!-- Outras colunas relacionadas ao setor -->
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $setor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo e($setor->id); ?></td>
                                <td class="border px-4 py-2"><?php echo e($setor->cod_setor); ?></td>
                                <td class="border px-4 py-2"><?php echo e($setor->nome); ?></td>
                                <!-- Outras colunas relacionadas ao setor -->
                                <td class="border px-4 py-2">
                                    <a href="<?php echo e(route('setor.show', $setor->id)); ?>" class="text-blue-500 hover:underline">Detalhes</a>
                                    <a href="<?php echo e(route('setor.edit', $setor->id)); ?>" class="text-yellow-500 hover:underline">Editar</a>
                                    <a href="<?php echo e(route('setor.destroy', $setor->id)); ?>" class="text-red-500 hover:underline">Excluir</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp2023\htdocs\intralivre\resources\views/setor/index.blade.php ENDPATH**/ ?>