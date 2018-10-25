class Matrix
{
    constructor(params = {})
    {
        this.param = {
            matrix_width:  10,
            matrix_height: 10
        }

        this.matrix = {};

        this.param = Object.assign(this.param, params)
    }

    static setItem()
    {
        let item = Math.random();

        return (item < 0.5) ? Math.floor(item) : Math.ceil(item);
    }

    setMatrix()
    {
        for (let i = 0; i < this.param.matrix_height; i++)
        {
            this.matrix[i] = [];

            for (let ii = 0; ii < this.param.matrix_width; ii++)
            {
                this.matrix[i].push(Matrix.setItem())
            }
        }

        return this;
    }

    countItems(posX, posY)
    {
        if (this.matrix[posX][posY] === 0)

            return false;

        let count = 0;

        let py = 1, my = 1, px = 1, mx = 1;

        for (let yy = posY; yy <= this.param.matrix_width*2; ++yy)
        {
            if (typeof(this.matrix[posX][yy]) !== 'undefined' && py === 1)
            {
                if (this.matrix[posX][yy] === 1)

                    count += 1;

                else py = 0;
            }

            if (typeof(this.matrix[posX][posY-yy]) !== 'undefined' && my === 1)
            {
                if (this.matrix[posX][posY-yy] === 1)

                    count += 1;

                else my = 0;
            }
        }

        for (let xx = posX; xx <= this.param.matrix_height*2; ++xx)
        {
            if (typeof(this.matrix[xx]) !== 'undefined' && px === 1)
            {
                if (this.matrix[xx][posY] === 1)

                    count += 1;

                else px = 0;
            }

            if (typeof(this.matrix[posX-xx]) !== 'undefined' && mx === 1)
            {
                if (this.matrix[posX-xx][posY] === 1)

                    count += 1;

                else mx = 0;
            }
        }

        return count;
    }

}
