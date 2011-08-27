<?php
namespace Iga\BootstrapBundle\Twig\TokenParser;

use \Twig_TokenParser;
use \Twig_Token;
use \Twig_Node_Block;
use \Twig_Node;
use \Twig_Node_Print;

class Container extends Twig_TokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param Twig_Token $token A Twig_Token instance
     *
     * @return Twig_NodeInterface A Twig_NodeInterface instance
     */
    public function parse(Twig_Token $token)
    {
    	
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
    
		$type = $stream->expect(Twig_Token::NAME_TYPE)->getValue();
		
		$class = ($type == "fluid") ? "container-fluid" : "container";
    	
    	$prepend = '<div class="' . $class . '">';
    	
    	$append = '</div>';


        if ($stream->test(Twig_Token::BLOCK_END_TYPE)) {
            $stream->next();

            $body = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
            if ($stream->test(Twig_Token::NAME_TYPE)) {
                $value = $stream->next()->getValue();

                if ($value != $name) {
                    throw new Twig_Error_Syntax(sprintf("Expected endblock for block '$name' (but %s given)", $value), $lineno);
                }
            }
            
        } else {
            $body = new Twig_Node(array(
                new Twig_Node_Print($this->parser->getExpressionParser()->parseExpression(), $lineno),
            ));
        }
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        $data = $body->getAttribute('data');
        $body->setAttribute('data',$prepend . $data . $append);

    	return $body;
    }

    public function decideBlockEnd(Twig_Token $token)
    {
        return $token->test('endcontainer');
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @param string The tag name
     */
    public function getTag()
    {
        return 'container';
    }
}
