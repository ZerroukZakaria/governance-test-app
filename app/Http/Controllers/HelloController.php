<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * HelloController
 *
 * Implements the leaf capability: urn:saas:capability:example.feature.hello
 *
 * GOVERNANCE COMPLIANCE:
 * - This controller handles ONLY the example.feature.hello capability
 * - Authorization, billing, and activation are enforced by ExecutionGateMiddleware
 * - No permission checks or billing logic in this controller (per governance separation)
 * - All invocations are audited at the gate level
 *
 * @see governance/governance/SaaS-Governance-v1.0.0.md
 * @see governance/governance/execution-gate-spec.yaml
 */
class HelloController extends Controller
{
    /**
     * Capability identifier for this controller's operation.
     */
    private const CAPABILITY_ID = 'urn:saas:capability:example.feature.hello';

    /**
     * Handle the hello capability invocation.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        // Business logic only - governance enforcement is handled by ExecutionGateMiddleware
        return response()->json([
            'capability' => self::CAPABILITY_ID,
            'message' => 'Hello from governance-compliant capability!',
            'timestamp' => now()->toIso8601String(),
        ]);
    }
}
