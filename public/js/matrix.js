class Matrix
{
    constructor(params = {})
    {
        this.param = {
            matrix_width:  10,
            matrix_height: 10
        };

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
        //https://www.geeksforgeeks.org/find-number-of-islands/

        if (this.matrix[posX][posY] === 0)

            return false;

        let count = [];

        let stack = {inc:{}, dec:{}};

        for (let x = posX; x < this.param.matrix_height; ++x)
        {
            if (this.matrix[x][posY] === 0)

                break;

            for (let y = posY; y < this.param.matrix_width; ++y)
            {
                // debugger;

                if (typeof(stack['inc'][x]) === 'undefined')
                {
                    if (this.matrix[x][y] === 1)

                        count.push([x, y]);

                    else stack['inc'][x] = 1;
                }

                if (posY-y >= 0 && typeof(stack['dec'][x]) === 'undefined')
                {
                    if (this.matrix[x][posY-y] === 1)

                        count.push([x, posY-y]);

                    else stack['dec'][x] = 1;
                }

                if (posX-x >= 0)
                {
                    if (posY-y >= 0 && this.matrix[posX-x][posY-y] === 1)

                        count.push([posX-x, posY-y]);

                    if (this.matrix[posX-x][y] === 1)

                        count.push([posX-x, y]);
                }
            }
        }

        return count;
    }

}
