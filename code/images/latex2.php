<?php
$environment = new \League\CommonMark\Environment\Environment();
// Add the core extension.
$environment->addExtension(new \League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension\CommonMarkCoreExtension());
// Add the LaTeX extension.
$environment->addExtension(new \Samwilson\CommonMarkLatex\LatexRendererExtension());
$converter = new \League\CommonMark\MarkdownConverter($environment);
$latex = $converter->convert('*Markdown* content goes here!')->getContent();

echo ($latex);