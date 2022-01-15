<?php

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['operators' => ['=' => 'align_single_space_minimal', '=>' => 'align_single_space_minimal']],
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_equal_normalize' => ['space' => 'single'],
        'doctrine_annotation_indentation' => true,
        'explicit_string_variable' => true,
        'fully_qualified_strict_types' => true,
        'increment_style' => ['style' => 'post'],
        'method_chaining_indentation' => true,
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => true,
        'no_alternative_syntax' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => ['sort_algorithm' => 'none'],
        'php_unit_method_casing' => ['case' => 'snake_case'],
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => true],
        'phpdoc_order' => true,
        'ternary_to_null_coalescing' => true,
        'declare_strict_types' => true,
        'global_namespace_import' => ['import_classes' => true, 'import_functions' => true,],
        'native_function_invocation' => [
            'exclude' => [],
            'include' => ['@internal'],
            'scope'   => 'namespaced',
            'strict'  => false,
        ],
        'native_constant_invocation' => [
            'exclude'      => ['null', 'false', 'true'],
            'include'      => [],
            'fix_built_in' => true,
            'scope'        => 'namespaced',
        ],
        'blank_line_before_statement' => ['statements' => [
            'return',
            'continue',
            'break',
            'try',
        ]],
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order'  => ['class', 'const', 'function']
        ],
        'strict_comparison' => true,
        'strict_param' => true,
        'void_return' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->exclude('var')
        ->exclude('docker')
        ->exclude('config')
        ->in(__DIR__)
    );
