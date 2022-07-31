@php
    $rand_num = rand(1,15);
    $quotes = [
        '1' => '“Your talent determines what you can do. 
            Your motivation determines how much you’re willing to do. 
            Your attitude determines how well you do it.” —Lou Holtz',
        '2' => '“Make each day your masterpiece.” —John Wooden',
        '3' => '“Don’t count the days, make the days count.” —Muhammad Ali',
        '4' => '“Believe you can and you’re halfway there.” —Theodore Roosevelt',
        '5' => '“The more I want to get something done the less I call it work.” —Richard Bach',
        '6' => '“Your imagination is your preview of life’s coming attractions.” —Albert Einstein',
        '7' => '“Try not. Do, or do not. There is no try.” —Yoda',
        '8' => '“Develop success from failures. Discouragement and failure are two of the surest stepping 
            stones to success.” —Dale Carnegie',
        '9' => '“Failure is the condiment that gives success its flavor.” —Truman Capote',
        '10' => '“What we fear of doing most is usually what we most need to do.” —Ralph Waldo Emerson',
        '11' => '“Coming together is a beginning, keeping together is progress, 
            working together is success.” —Henry Ford',
        '12' => '“Don’t aim for success if you want it, just do what you love 
            and believe in and it will come naturally.” —David Frost',
        '13' => '“Success is a state of mind. If you want success, 
            start thinking of yourself as a success.” —Joyce Brothers',
        '14' => '“Even if you’re on the right track, you’ll get run over if you just sit there.” 
            —Will Rogers',
        '15' => '“Light tomorrow with today.” —Elizabeth Barrett Browning'
    ];
    $quote = $quotes[$rand_num];
@endphp

<p>{{ $quote }}</p>