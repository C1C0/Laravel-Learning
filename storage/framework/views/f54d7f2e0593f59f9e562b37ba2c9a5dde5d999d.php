<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">


        <!--  Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <?php
            if (isset($component)) {
                $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component;
            } ?>
            <?php
            $component = $__env->getContainer()->make(
                Illuminate\View\AnonymousComponent::class,
                ['view' => 'components.dropdown', 'data' => []]
            ); ?>
            <?php
            $component->withName('dropdown'); ?>
            <?php
            if ($component->shouldRender()): ?>
                <?php
                $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php
                $component->withAttributes([]); ?>
                <?php
                $__env->slot('trigger', null, []); ?>
                <button class="inline-flex w-full py-2 pl-3 pr-9 text-sm font-semibold lg:w-32 text-left">

                    <?php
                    echo e(isset($currentCategory) ? ucwords($currentCategory->name) : "Categories"); ?>


                    <?php
                    if (isset($component)) {
                        $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component;
                    } ?>
                    <?php
                    $component = $__env->getContainer()->make(
                        Illuminate\View\AnonymousComponent::class,
                        [
                            'view' => 'components.icon',
                            'data' => [
                                'name' => ''.e(
                                        Config::get('constants.ICONS.ARROW_DOWN')
                                    ).'',
                                'class' => 'absolute pointer-events-none',
                                'style' => 'right: 12px;'
                            ]
                        ]
                    ); ?>
                    <?php
                    $component->withName('icon'); ?>
                    <?php
                    if ($component->shouldRender()): ?>
                        <?php
                        $__env->startComponent($component->resolveView(), $component->data()); ?>
                        <?php
                        $component->withAttributes(
                            [
                                'name' => ''.e(Config::get('constants.ICONS.ARROW_DOWN')).'',
                                'class' => 'absolute pointer-events-none',
                                'style' => 'right: 12px;'
                            ]
                        ); ?>
                        <?php
                        if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
                            <?php
                            $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
                            <?php
                            unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
                        <?php
                        endif; ?>
                        <?php
                        echo $__env->renderComponent(); ?>
                    <?php
                    endif; ?>
                </button>
                <?php
                $__env->endSlot(); ?>

                <?php
                if (isset($component)) {
                    $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component;
                } ?>
                <?php
                $component = $__env->getContainer()->make(
                    Illuminate\View\AnonymousComponent::class,
                    [
                        'view' => 'components.dropdown-item',
                        'data' => [
                            'href' => '/',
                            'active' => request()->routeIs('home')
                        ]
                    ]
                ); ?>
                <?php
                $component->withName('dropdown-item'); ?>
                <?php
                if ($component->shouldRender()): ?>
                    <?php
                    $__env->startComponent($component->resolveView(), $component->data()); ?>
                    <?php
                    $component->withAttributes(
                        [
                            'href' => '/',
                            'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
                                request()->routeIs('home')
                            )
                        ]
                    ); ?>All <?php
                    if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
                        <?php
                        $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
                        <?php
                        unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
                    <?php
                    endif; ?>
                    <?php
                    echo $__env->renderComponent(); ?>
                <?php
                endif; ?>

                <?php
                $__currentLoopData = $categories;
                $__env->addLoop($__currentLoopData);
                foreach ($__currentLoopData as $category): $__env->incrementLoopIndices();
                    $loop = $__env->getLastLoop(); ?>
                    <?php
                    if (isset($component)) {
                        $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component;
                    } ?>
                    <?php
                    $component = $__env->getContainer()->make(
                        Illuminate\View\AnonymousComponent::class,
                        [
                            'view' => 'components.dropdown-item',
                            'data' => [
                                'href' => '/categories/'.e(
                                        $category->slug
                                    ).'',
                                'active' => request()->is(
                                    "categories/{$category->slug}"
                                )
                            ]
                        ]
                    ); ?>
                    <?php
                    $component->withName('dropdown-item'); ?>
                    <?php
                    if ($component->shouldRender()): ?>
                        <?php
                        $__env->startComponent($component->resolveView(), $component->data()); ?>
                        <?php
                        $component->withAttributes(
                            [
                                'href' => '/categories/'.e($category->slug).'',
                                'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
                                    request()->is("categories/{$category->slug}")
                                )
                            ]
                        ); ?>
                        <?php
                        echo e(ucwords($category->name)); ?>

                        <?php
                        if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
                            <?php
                            $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
                            <?php
                            unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
                        <?php
                        endif; ?>
                        <?php
                        echo $__env->renderComponent(); ?>
                    <?php
                    endif; ?>
                <?php
                endforeach;
                $__env->popLoop();
                $loop = $__env->getLastLoop(); ?>
                <?php
                if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
                    <?php
                    $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
                    <?php
                    unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
                <?php
                endif; ?>
                <?php
                echo $__env->renderComponent(); ?>
            <?php
            endif; ?>
        </div>

        <!-- Other Filters -->


        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text"
                       name="search"
                       placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="<?php
                       echo e(request(Config::get('constants.GET_REQUEST.SEARCH'))); ?>">
            </form>
        </div>
    </div>
</header><?php
/**PATH C:\Users\kpsko\Documents\WEB projects\LARAVEL\FirstLaravelBlog\resources\views/_posts-header.blade.php ENDPATH**/ ?>
