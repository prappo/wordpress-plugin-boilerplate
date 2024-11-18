import { useState } from "react";
import "./index.css";

function App() {
  const [count, setCount] = useState(0);

  const increment = () => setCount((count) => count + 1);

  return (
    <div className="App">
      <h2>Vite + React + WordPress Plugin Boilerplate </h2>
      <div className="card">
        <button onClick={increment}>count is {count}</button>
        <p>
          Edit <code>src/App.jsx</code> and save to test HMR
        </p>
      </div>
      <h1 className="text-3xl font-bold underline">Hello WordPress!</h1>
    </div>
  );
}

export default App;
