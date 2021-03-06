package org.develnext.jphp.core.tokenizer.token.expr.operator.cast;

import php.runtime.memory.DoubleMemory;
import php.runtime.Memory;
import org.develnext.jphp.core.tokenizer.TokenMeta;
import org.develnext.jphp.core.tokenizer.TokenType;

public class DoubleCastExprToken extends CastExprToken {
    public DoubleCastExprToken(TokenMeta meta) {
        super(meta, TokenType.T_DOUBLE_CAST);
    }

    @Override
    public Class<?> getResultClass() {
        return Double.TYPE;
    }

    @Override
    public Memory calc(Memory o1, Memory o2) {
        return new DoubleMemory(o1.toDouble());
    }

    @Override
    public String getCode() {
        return "toDouble";
    }
}
