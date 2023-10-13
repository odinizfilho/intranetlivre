<?php if (isset($component)) { $__componentOriginalc300ce46522ac18e918dfa75e841329e = $component; } ?>
<?php $component = App\View\Components\IntraLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('intra-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\IntraLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
    <div class="flex flex-col justify-center items-center px-6 mx-auto h-screen xl:px-0">
        <div class="block md:max-w-lg">
            <img src="/images/illustrations/404.svg" alt="astronaut image">
        </div>
        <div class="text-center xl:max-w-4xl">
            <h1 class="mb-3 text-2xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl">Página não encontrada</h1>
            <p class="mb-5 text-base font-normal text-gray-500 md:text-lg">Ops! Parece que você seguiu um link incorreto. Se você acha que isso é um problema para nós, informe-nos.</p>
            <a class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-blue-500 hover:text-blue-700 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm py-3 px-4 dark:ring-offset-slate-900" href="/">
                <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Voltar 
              </a>
        </div>
    </div>
    
  
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc300ce46522ac18e918dfa75e841329e)): ?>
<?php $component = $__componentOriginalc300ce46522ac18e918dfa75e841329e; ?>
<?php unset($__componentOriginalc300ce46522ac18e918dfa75e841329e); ?>
<?php endif; ?>
<?php /**PATH C:\xampp2023\htdocs\intralivre\resources\views/errors/404.blade.php ENDPATH**/ ?>