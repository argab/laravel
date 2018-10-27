class Matrix
{
    constructor(params = {})
    {
        this.param = {
            matrix_width:  10,
            matrix_height: 10
        };

        this.matrix = {};

        this.count = {};

        this.stack = [];

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

    countItemsY(posX, posY)
    {
        let goXY = 1;
        let goXy = 1;
        let dcy = 0;

        for (let y = posY; y < this.param.matrix_width; ++y)
        {
            if (goXY && this.matrix[posX][y] === 1)
            {
                this.count[posX + '-' + y] = 1;

                if (y > posY && ((posX - 1 >= 0 && this.matrix[posX - 1][y] === 1)

                    || (posX + 1 < this.param.matrix_height && this.matrix[posX + 1][y] === 1)))

                        this.stack.push([posX, y]);
            }

            else goXY = 0;

            if (goXy && posY-dcy >= 0 && this.matrix[posX][posY-dcy] === 1)
            {
                this.count[posX + '-' + (posY-dcy)] = 1;

                if ((posX - 1 >= 0 && this.matrix[posX - 1][posY-dcy] === 1)

                    || (posX + 1 < this.param.matrix_height && this.matrix[posX + 1][posY-dcy] === 1))

                        this.stack.push([posX, posY-dcy]);
            }

            else goXy = 0;

            dcy += 1;
        }
    }

    countItems(posX, posY)
    {
        let goXx = 1;
        let goXX = 1;
        let dcx = 0;

        for (let x = posX; x < this.param.matrix_height; ++x)
        {
            // debugger;

            if (goXX && this.matrix[x][posY] === 1)
            {
                this.count[x + '-' + posY] = 1;

                this.countItemsY(x, posY)
            }
            else
            {
                goXX = 0;
            }

            if (goXx && posX-dcx >= 0)
            {
                if (this.matrix[posX - dcx][posY] === 1)
                {
                    this.count[(posX - dcx) + '-' + posY] = 1;

                    this.countItemsY(posX - dcx, posY)
                }
                else
                {
                    goXx = 0;
                }
            }

            dcx += 1;
        }
    }

    fetchStack()
    {
        let x = 0;
        let y = 0;
        let s = {};
        let f = [];

        while(true)
        {
            if (this.stack.length === 0)

                break;

            this.stack.filter(stack =>
            {
                if ( ! (('' + stack[0] + stack[1]) in s))
                {
                    f.push([stack[0], stack[1]]);

                    s['' + stack[0] + stack[1]] = 1;
                }
            });

            x = f[0];
            y = f[1];

            this.stack = f.slice(0, 1);

            this.countItems(x, y);
        }

        console.log(this.count);
    }
}
